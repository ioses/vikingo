/**
 * @author D641598
 * 
 * 
 * 
 * 
 */


function getImgData(chartContainer) {
    var chartArea = chartContainer.getElementsByTagName('svg')[0].parentNode;
    var svg = chartArea.innerHTML;
    var doc = chartContainer.ownerDocument;
    var canvas = doc.createElement('canvas');
	canvas.setAttribute('id', 'canvas');
    canvas.setAttribute('width', chartArea.offsetWidth);
    canvas.setAttribute('height', chartArea.offsetHeight);

    canvas.setAttribute(
        'style',
        'position: absolute; ' +
        'top: ' + (-chartArea.offsetHeight * 2) + 'px;' +
        'left: ' + (-chartArea.offsetWidth * 2) + 'px;');
    doc.body.appendChild(canvas);
    canvg(canvas, svg);
    var imgData = canvas.toDataURL("image/png");

    return imgData;
  }


function saveAsImg(chartContainer,title) {
    var imgData = getImgData(chartContainer);
	
	var cnvs = document.getElementById('canvas');
	var cs = new CanvasSaver('http://proyectovikingo.es/WEB/Estadisticas/imagenes_descarga/getInputImagen.php');
	cs.savePNG(cnvs, title);
	
	canvas.parentNode.removeChild(canvas);
}


  
function CanvasSaver(url) {
     
    this.url = url;
     
    this.savePNG = function(cnvs, fname) {
        if(!cnvs || !url) return;
        fname = fname || 'picture';
         
        var data = cnvs.toDataURL("image/png");
        data = data.substr(data.indexOf(',') + 1).toString();
         
        var dataInput = document.createElement("input") ;
        dataInput.setAttribute("name", 'imgdata') ;
        dataInput.setAttribute("value", data);
        dataInput.setAttribute("type", "hidden");
         
        var nameInput = document.createElement("input") ;
        nameInput.setAttribute("name", 'name') ;
        nameInput.setAttribute("value", fname + '.png');
         
        var myForm = document.createElement("form");
        myForm.method = 'post';
        myForm.action = url;
        myForm.appendChild(dataInput);
        myForm.appendChild(nameInput);
         
        document.body.appendChild(myForm) ;
        myForm.submit() ;
        document.body.removeChild(myForm) ;
    };
     
    this.generateButton = function (label, cnvs, fname) {
        var btn = document.createElement('button'), scope = this;
        btn.innerHTML = label;
        btn.style['class'] = 'canvassaver';
        btn.addEventListener('click', function(){scope.savePNG(cnvs, fname);}, false);
         
        document.body.appendChild(btn);
         
        return btn;
    };
}
	
