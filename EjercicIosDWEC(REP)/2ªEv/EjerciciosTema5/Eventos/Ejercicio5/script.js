let capa1=document.getElementById("capa1");

let capa2=document.getElementById("capa2");

capa1.addEventListener("dragstart",()=>{
    capa1.style.opacity="50";
    capa2.addEventListener("dragover",()=>{

        capa1.addEventListener("dragend",()=>{
            capa1.style.display="none";
        });
    })
});