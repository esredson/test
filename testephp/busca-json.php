<?php
    require_once("cabecalho.php");
?>
<div class="lista">
</div>
<script>
const div=document.querySelector('.lista')
fetch('produto-api.php')
.then(res => res.json())
.then(produtos => {
    const template = `<ul>${produtos.map(produto=>`<li>${produto.nome}</li>`).join('')}</ul>`
    div.innerHTML = template
})
</script>
<?php
    require_once("rodape.php");
?>