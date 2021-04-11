window.addEventListener('ElementDeleted', event => {

    swal({
    title: "Success!",
    text: "Element successfully deleted!",
    icon: "success",
    
    });
    
    
    })
    
    
     window.addEventListener('FileNotFound', event => {
    
      swal({
      title: "Error!",
      text: "File not found!",
      icon: "warning",
    
    });
    
    
    })
    
    
    window.addEventListener('ProcessEnded', event => {
    
    swal({
    title: "Error!",
    text: "Process has been ended!",
    icon: "success",
    
    });
    
    
    })
    
    
    
    window.addEventListener('RefreshDropDown', event => {
    
      $('.dropdown-toggle').dropdown()
    
    })

    window.addEventListener('BatchResellAdded', event => {

      swal({
          title: "Success!",
          text: "Batch resell successfully created!",
          icon: "success",

      });

  
  })


  window.addEventListener('BatchResellUpdated', event => {

    swal({
        title: "Success!",
        text: "Batch resell successfully updated!",
        icon: "success",

    });


})