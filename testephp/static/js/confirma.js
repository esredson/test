const $=document.querySelectorAll.bind(document);
[...$(".col-remove form")]
    .forEach(form => form.onsubmit = event =>{
        event.preventDefault();
        if(confirm("Confirma?")){ 
            const id = event.target.querySelector("input[type=hidden]").value; 
            fetch(`remove-produto.php?id=${id}`)
            .then(()=>$(`[data-pid='${id}']`)[0].remove())
            .catch(err=>console.log(err));
            
        }
    });