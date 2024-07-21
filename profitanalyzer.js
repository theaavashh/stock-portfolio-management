function validation()
{
      let a=document.getElementById("bprice").value;

let b=document.getElementById("cprice").value;
let c=document.getElementById("units").value;
let d=c*a;
let e=c*b;

let f=e-d;
document.getElementById("profitearn").value=f;
// document.getElementById("profitearn").style.visibility="visible";
return false;
}