//Agrgar o remover imputs para los link de pie de pagina
var counter=$('#counter').val();
savePie(counter);
$('#addButton').click(function () {
  addInput(counter);
  counter++;
});
$('#removeButton').click(function () {
  counter--;
  removeInput(counter);
});

$('#saveBtnPie').click(function () {
  savePie(counter);
});

function addInput() {
  if (counter>6){
    alert("Maximo de 6 links alcanzados");

    return false;
  }
  var v = parseInt(counter)+1;
  var newTextBoxDivA = $(document.createElement('div')).attr('id','TextBoxDivA'+v);
  newTextBoxDivA.after().html('<input type="text" class="form-control" placeholder="titulo" name="textboxA'+v+'" id="textboxA'+v+'"><hr class="bc-celeste">');
  newTextBoxDivA.appendTo('#TextBoxesGroupA');

  var newTextBoxDivB = $(document.createElement('div')).attr('id','TextBoxDivB'+v);
  newTextBoxDivB.after().html('<input type="text" class="form-control" placeholder="enlace" name="textboxB'+v+'" id="textboxB'+v+'"><hr class="bc-celeste">');
  newTextBoxDivB.appendTo('#TextBoxesGroupB');

}

function removeInput() {
  if(counter==0){
    alert("No hay mas que remover");
    return false;
  }
  var v = parseInt(counter)+1;
  $('#TextBoxDivA'+v).remove();
  $('#TextBoxDivB'+v).remove();
}

function savePie() {
  var titulos=[];
  var links=[];
  var sjson = '{'
  var v=1
  for (var i = 0; i <counter; i++) {
     //titulos[i]=$('#textboxA'+i).val();
     //links[i]=$('#textboxB'+i).val();

     if (i == (counter-1)) {
       sjson = sjson + '"'+i+'":["'+$('#textboxA'+v).val()+'","'+$('#textboxB'+v).val()+'"]}';
     }else {
       sjson = sjson + '"'+i+'":["'+$('#textboxA'+v).val()+'","'+$('#textboxB'+v).val()+'"],';
     }
     v++;
  }
  $('#pie_title').val(sjson);
  //$('#pie_title').val(titulos.toString());
  //$('#pie_link').val(links.toString());
}
