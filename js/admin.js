function admin_edit(rowClass)
{
    const row = document.querySelector(rowClass);
    const cells = row.querySelectorAll('td');

    form = document.createElement("form");
    row.appendChild(form);

    div = document.createElement("div");
    div.classList.add("form-row");
    form.appendChild(div);

    for (i = 0; i < cells.length-1; i++){
        row.removeChild(cells[i]);
        
        newCell = document.createElement("td");
        row.insertBefore(newCell, cells[cells.length-1]);
        
        newInput = document.createElement(cellHTML(i));
        newInput.type = cellType(i);
        newInput.value = cells[i].innerText;
        newInput.classList.add("form-control");
        newCell.appendChild(newInput);
    }

    submit = document.createElement("input");
    submit.type = "submit";
    submit.classList.add("btn btn-primary btn-sm");
    div.appendChild(submit);
}

function cellHTML(i)
{
    switch(i)
    {
        case 6: return "select";
        case 7: return "select";
        default: return "input";
    }
}

function cellType(i)
{
    switch(i)
    {
        case 0: return "email";
        default: return "";
    }
}