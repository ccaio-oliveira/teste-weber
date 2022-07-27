const btnRemove = document.querySelectorAll('.remove-prod');
const divProd = document.querySelectorAll('.prod-item');

for(let i = 0; i < btnRemove.length; i++){

    btnRemove[i].onclick = () => {

        divProd[i].remove();
        
    }

}
