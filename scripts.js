function edit_id(id){           
    window.location.href='edit_data.php?edit_id='+id;            
}

function delete_id(id){
    if(confirm('Deseja confirmar a deleção?')){
            window.location.href='index.php?delete_id='+id;
    }
}
