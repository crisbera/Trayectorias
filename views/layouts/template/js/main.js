$("#reiniciar").click(function(){
    if(confirm("Seguro de borrar todo?")){
        $("#reiniciar").attr("href", "http://localhost/trayectorias/calculos/borrarTrayectorias");
    }
    else{
        return false;
    }
});

$("eliminar").click(function(){
    if(confirm("Seguro de eliminar?")){
        $("#eliminar").attr("href", "http://localhost/trayectorias/calculos/borrarTrayectorias");
    }
    else{
        return false;
    }
});

$(document).ready(function(){
   $("#marca").change(function () {
           $("#marca option:selected").each(function () {
            elegido=$(this).val();
            $.post("../modelos.php", { elegido: elegido }, function(data){
            $("#modelo").html(data);
            });            
        });
   })
});

$(document).ready(function(){
   $("#conducto").change(function () {
           $("#conducto option:selected").each(function () {
            elegido=$(this).val();
            $.post("../modelos.php", { elegido: elegido }, function(data){
            $("#tubo_tipo").html(data);
            });            
        });
   })
});

$(document).ready(function(){
   $("#cable_tipo").change(function () {
           $("#cable_tipo option:selected").each(function () {
            elegido=$(this).val();
            $.post("http://localhost/trayectorias/calculos/listarCables", { elegido: elegido }, function(data){
            $("#cable").html(data);
            });            
        });
   })
});