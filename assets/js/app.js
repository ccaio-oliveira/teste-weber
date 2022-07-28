
async function apagarProduto(id){

    await fetch('config/apagar.php?id=' + id);
    location.reload();
    
}