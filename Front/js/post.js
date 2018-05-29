(function _post($, window) {
  const postID = getUrlParameter("post");
  if(isFinite(postID) && postID > 0){
    const url = window.location;
    const $likeBTN = $(".post .like .add");
    const $dislikeBTN = $(".post .like .remove");
    const $points = $('.post .point-count');
  
    function init() {
      $likeBTN.click(() => {
        $.post(url, {
          AJAX: true, 
          like: true, 
          post_id: postID
        }, function(result){
          changeOutput(result);
        });
      });
      $dislikeBTN.click(() => {
        $.post(url, {
          AJAX: true, 
          dislike: true, 
          post_id: postID
        }, function(result){
          changeOutput(result);
        });
      });
    }  

    function changeOutput(result){
      $points.text(result);
    }
  
    $(document).ready(init);
  }
}(jQuery, window));
