<script>
    var optionsarr  = [];
$("#saveoption").on("click",function(){
    if (!$('#stackname').val()){
        alert("Invalid stack name");
        return 
    }
  var stackoption=  $("#stackoptions").val();
 var amount=   $("#amount").val();

if(stackoption && amount){
    stackarr = [];
    optionsarr.forEach(function(e){
        if (  e.stackoption  ){ 
            stackarr.push(e.stackoption);
        }
    })  
  if(   $.inArray(stackoption,  stackarr) < 0 && stackoption){
    optionsarr.push({stackoption,amount});
  writeTable(optionsarr);
  }
}else{
   alert("Kindly Enter Valid Data") 
}
}) 
function writeTable(array) {
    // declare html variable (a string holder):
    var html = '';
    console.log(array)
    for (var i = 0; i < array.length ; i++) {
        // add opening <tr> tag to the string:
        html += '<tr>';
        
            // add <td> elements to the string:
            html += '<td>' + (i + 1) + '</td>';
            html += '<td>' + array[i].stackoption+ '</td>';
            html += '<td>' + array[i].amount+ '</td>'; 
       
        // add closing </tr> tag to the string:
        html += '</tr>';
    }
    //append created html to the table body:
    $('#body').html(html);
    // reset the count: 
}
</script>