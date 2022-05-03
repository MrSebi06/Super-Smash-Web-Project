function line(){
    const canvas = document.querySelector("#canvas");

    if (!canvas.getContext){
        return;
    }

    const ctx = canvas.getContext('2d');

    ctx.strokeStyle = 'rgb(0, 0, 0, .5)';
    ctx.lineWidth = 1;

    ctx.beginPath();
    for (i = 0; i < window.innerHeight; i += 2){
        console.log(i);
        ctx.moveTo(i, 0);
        ctx.lineTo(i, window.innerWidth);
        ctx.stroke();
    }
}

line();