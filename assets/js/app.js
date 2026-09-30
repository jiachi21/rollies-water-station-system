function tableSearch(inputId,tableId){

let input=document.getElementById(inputId);

let table=document.getElementById(tableId);


input.addEventListener("keyup",function(){


let value=this.value.toLowerCase();


let rows=table.rows;


for(let i=1;i<rows.length;i++){


rows[i].style.display =
rows[i].innerText
.toLowerCase()
.includes(value)
?
""
:
"none";


}


});


}