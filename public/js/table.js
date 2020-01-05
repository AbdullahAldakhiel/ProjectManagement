     $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='name"+i+"' type='text' placeholder='Task name' class='form-control input-md'  /> </td><td><input  name='duration"+i+"' type='text' placeholder='duration'  class='form-control input-md'></td><td><input  name='start"+i+"' type='text' placeholder='yyyy-mm-dd'  class='form-control input-md'></td><td><input  name='finish"+i+"' type='text' placeholder='yyyy-mm-dd'  class='form-control input-md'></td>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++;
  });
     $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });

});
