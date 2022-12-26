comprobar.addEventListener("click",()=>{
    fetch("palindromo.php", {
        method: "POST",
        body: new FormData(frm)
    }).then(response => response.text()).then(response => {
        if (response == "ok"){
            Swal.fire({
                //position: 'top-end',
                icon: 'success',
                title: 'Comprobado',
                showConfirmButton: false,
                timer: 1500
              })
              frm.reset();
        }

    })
})