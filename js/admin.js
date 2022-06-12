function admin_edit(rowClass)
{
    const row = document.querySelector(rowClass);   // On stocke la ligne du tableau à modifier
    const cells = row.querySelectorAll('td');       // On stocke chaque cellule de cette ligne
    const id = row.querySelector('th');

    const buttons = document.querySelectorAll('tr button');
    buttons.forEach(element => {
        console.log(element);
        element.style.display = 'none';
    });

    const newInput = document.createElement('input');
    newInput.value = id.innerText;
    newInput.type = 'number';
    newInput.setAttribute('form', 'admin-user-form');
    newInput.setAttribute('min', '0');
    newInput.setAttribute("name", "id");
    newInput.classList.add("form-control");
    newInput.classList.add("form-control-lg");

    id.innerText = "";
    id.appendChild(newInput);

    for (i = 0; i < cells.length-1; i++){           // On parcourt chaque cellule de la ligne à modifier       
        const tag = cellHTML(i);                    
        const newInput = document.createElement(tag);     // Création de la balise qui remplacera la cellule (type 'input' ou 'select')

        const td = document.createElement('td');

        newInput.type = cellType(i);

        if (tag === 'select'){
            if (i == 7){
                options = ['User', 'Admin', 'Dev'];
            } else {
                options = ['Europe', 'N-America', 'S-America', 'Asia', 'Oceania', 'Africa'];
            }

            for (k = 0; k < options.length; k++){
                newOption = document.createElement('option');
                newOption.innerText = options[k];
                newInput.appendChild(newOption);
            }

        } else {
            newInput.value = cells[i].innerText;
        }
        
        row.removeChild(cells[i]);
        

        newInput.classList.add("form-control");
        newInput.classList.add("form-control-lg");
        newInput.setAttribute("form", "admin-user-form");
        newInput.setAttribute("name", i);
        
        row.insertBefore(td, cells[cells.length-1]);
        td.appendChild(newInput);
    }

    sub = document.createElement("input");
    sub.type = "submit";
    sub.classList.add("btn", "btn-primary", "btn-sm");
    sub.style.width = "100%";
    cells[cells.length-1].appendChild(sub);
}

function cellHTML(i)
{
    switch(i)
    {
        case 7: return "select";
        case 8: return "select";
        default: return "input";
    }
}

function cellType(i)
{
    switch(i)
    {
        case 0: return "email";
        case 2: return "file";
        case 6: return "date";
        case 10: return "date";
        default: return "";
    }
}
