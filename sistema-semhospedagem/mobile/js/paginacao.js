 J(document).ready(function(){

  function showLoader(){
    J('.search-background').fadeIn(200);
  }
  function hideLoader(){
    J('.search-background').fadeOut(200);
  };
  
  J("#paging_button li").click(function(){
    showLoader();
    
    J("#paging_button li").css({'background-color' : ''});
    J(this).css({'background-color' : '#D8543A'});
    J("#pgofertas").load(URLWEB+"/include/paginacao_post.php?idparceiro="+ID_PARCEIRO+"&page=" + this.id, hideLoader);
    
    return false;
  });
  
  J("#1").css({'background-color' : '#D8543A'});
  showLoader();

  J("#pgofertas").load(URLWEB+"/include/paginacao_post.php?idparceiro="+ID_PARCEIRO+"&page=1", hideLoader);
 

});