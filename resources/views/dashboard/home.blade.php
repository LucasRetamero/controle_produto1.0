<style type="text/css">
* {font-family: Arial;}
#wrapper { width: 620px; margin-left:30px;}
table {margin:25px 0 50px 0;float: left;}
td, th {padding: 5px 20px 5px 5px;font-size: 25px;}
canvas { margin:30px 50px; float:right;}

</style>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>
          </div>

            <!-- Main content -->

      
	 <div id="wrapper">
<canvas id="canvas" width="300" height="300"></canvas>
<table id="mydata">
 <thead> 
  <tr>       
	<th>Endereços</th>
	<th>Valores</th> 
  </tr>
 </thead>
 
 <tbody>
  <tr>
	<td>Existentes</td>  
	<td>{{ $allEndereco }}</td>  
   </tr>
   
   <tr>
	<td>Ocupados</td>  
	<td>{{ $usedEndereco }}</td>  
  </tr>
  
  <tr>
	<td>Vazio</td>  
	<td>{{ $emptyEndereco }}</td>  
  </tr>


 
 </tbody>
</table>

<!--<button type="button" class="btn btn-primary h5" id="muda-cor">Mudar cores</button>-->
</div>

<script type="text/javascript">
window.onload = function() {
(function() { //keep the global space clean
    ///// STEP 0 - setup
    // source data table and canvas tag
    var data_table = document.getElementById('mydata');
    var canvas = document.getElementById('canvas');
    var td_index = 1; // which TD contains the data

    ///// STEP 1 - Get the, get the, get the data!

    // get the data[] from the table
    var tds, data = [], color, colors = [], value = 0, total = 0;
    var trs = data_table.getElementsByTagName('tr'); // all TRs
    for (var i = 0; i < trs.length; i++) {
        tds = trs[i].getElementsByTagName('td'); // all TDs

        if (tds.length === 0) continue; //  no TDs here, move on

        // get the value, update total
        value  = parseFloat(tds[td_index].innerHTML);
        data[data.length] = value;
        total += value;

        // random color
        color = getColor();
        colors[colors.length] = color; // save for later
        trs[i].style.backgroundColor = color; // color this TR
    }

    ///// STEP 2 - Draw pie on canvas

    // exit if canvas is not supported
    if (typeof canvas.getContext === 'undefined') {
        return;
    }

    // get canvas context, determine radius and center
    var ctx = canvas.getContext('2d');
    var canvas_size = [canvas.width, canvas.height];
    var radius = Math.min(canvas_size[0], canvas_size[1]) / 2;
    var center = [canvas_size[0]/2, canvas_size[1]/2];

    var sofar = 0; // keep track of progress
    // loop the data[]
    for (var piece in data) {

        var thisvalue = data[piece] / total;

        ctx.beginPath();
        ctx.moveTo(center[0], center[1]); // center of the pie
        ctx.arc(  // draw next arc
            center[0],
            center[1],
            radius,
            Math.PI * (- 0.5 + 2 * sofar), // -0.5 sets set the start to be top
            Math.PI * (- 0.5 + 2 * (sofar + thisvalue)),
            false
        );

        ctx.lineTo(center[0], center[1]); // line back to the center
        ctx.closePath();
        ctx.fillStyle = colors[piece];    // color
        ctx.fill();

        sofar += thisvalue; // increment progress tracker
    }

    ///// DONE!

    // utility - generates random color
    function getColor() {
        var rgb = [];
        for (var i = 0; i < 3; i++) {
            rgb[i] = Math.round(100 * Math.random() + 155) ; // [155-255] = lighter colors
        }
        return 'rgb(' + rgb.join(',') + ')';
    }


var mudarCor = document.getElementById("muda-cor"); 
mudarCor.onclick = function() {
window.location.reload();
}

})() // exec!
}
</script>
