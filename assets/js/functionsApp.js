var load_image = "<p align=\"center\" id=\"load_image_div\"><img id='load_image' src='assets/css/images/ajax-loader.gif' width=\"18px\"/></p>";


// link su pagina profilo
function goToProfile(a){
	location.href = 'page_profile.php?uid='+a;
}


// link su pagina PLAce
function goToPlace(a){
	location.href='page_profile_place.php?pid='+a;
}

// link su pagina likes
function goToLikes(a, n){
  location.href='modal_like.php?pid='+a+'&n='+n;
}

// link su pagina spotted request
function goSpottedRequest(a, n){
  location.href='modal_spotted_request.php?pid='+a+'&n='+n;
}

// link su pagina comments
function goToComments(a, n){
  location.href='modal_comments.php?pid='+a+'&n='+n;
}

function goToDetailsPost(a){
  location.href='page_post_details.php?sid='+a;
}

function goToSegnalaPost(a){
  location.href='page_report_post.php?sid='+a;
}
function goToBloccaUtente(a){
  location.href='page_post_details.php?sid='+a;
}
function goToSegnalaUtente(a){
  location.href='page_report_users.php?uid='+a;
}

function goToNascondiPost(a){
  location.href='hidePost.php?sid='+a;
}


function goToEliminaPost(a){
  location.href='deletePost.php?sid='+a;
}

function goToChat(a){
  location.href='page_chat_details.php?to_uid='+a;
}




function openModalSpottedRequest(pid, tuid){
  var myModal = new bootstrap.Modal(document.getElementById('DialogIconedButton'));
  myModal.show();

  $.ajax({
          url: 'core/getInfoModalSpottedRequest.php',
          type: 'POST',
          data:   {
            post_id: pid,
            to_user: tuid,
          },
          statusCode: {
            500: function() {
              //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
            }
          }
        }).done(function(response) {
            $('#DialogSpottedRequestInfo').html(response);

        }).fail(function() {
                        //$('#'+div_id).html(response);
        });
}


function confirmSpottedRequest(pid, tuid){
  $.ajax({
            url: 'core/confirmSpottedRequest.php',
            type: 'POST',
            data:   {
              post_id: pid,
              to_user: tuid,
            },
            statusCode: {
              500: function() {
                //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
              }
            }
          }).done(function(response) {
              //$('#comment_post_id').val();//setto hidden post id in comment_text
              //localStorage.setItem('comment_post_id', pid);
              getSpottedRequest(pid, 1);
              //$('#commentModalContent').html(response);

          }).fail(function() {
                          //$('#'+div_id).html(response);
          });
}


// data-bs-target="#DialogIconedButton"



var skeleton = '<div class="wide-block pt-2 pb-2 placeholder-glow">'+
'                <span class="placeholder col-6"></span>'+
'                <span class="placeholder w-75"></span>'+
'                <span class="placeholder col-12"></span>'+
'            </div>';
    //$('#main_content').html(skeleton);


function like_on(pid){

  $.ajax({
          url: 'core/getLikeOn.php',
          type: 'POST',
          data:   {
            post_id: pid,
          },
          statusCode: {
            500: function() {
              //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
            }
          }
        }).done(function(response) {
            $('#like_box_'+pid).html(response);
            updatePiaceAString(pid);

        }).fail(function() {
                        //$('#'+div_id).html(response);
        });
}

function like_off(pid){

      $.ajax({
          url: 'core/getLikeOff.php',
          type: 'POST',
          data:   {
            post_id: pid,
          },
          statusCode: {
            500: function() {
              //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
            }
          }
          }).done(function(response) {
              $('#like_box_'+pid).html(response);
              updatePiaceAString(pid);

          }).fail(function() {
                          //$('#'+div_id).html(response);
      });
}

function updatePiaceAString(pid){
  $.ajax({
          url: 'core/getPiaceAString.php',
          type: 'POST',
          data:   {
            post_id: pid,
          },
          statusCode: {
            500: function() {
              //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
            }
          }
          }).done(function(response) {
              $('#piace_a_box_'+pid).html(response);

          }).fail(function() {
                          //$('#'+div_id).html(response);
      });

}
function getComments(pid, cn){
  $.ajax({
            url: 'core/getComments.php',
            type: 'POST',
            data:   {
              post_id: pid,
              cn: cn,
            },
            statusCode: {
              500: function() {
                //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
              }
            }
          }).done(function(response) {
              //$('#comment_post_id').val();//setto hidden post id in comment_text
              //localStorage.setItem('comment_post_id', pid);

              $('#commentModalContent').html(response);

          }).fail(function() {
                          //$('#'+div_id).html(response);
          });
}


function getSpottedRequest(pid, n){
  $.ajax({
            url: 'core/getSpottedRequest.php',
            type: 'POST',
            data:   {
              post_id: pid,
              n: n,
            },
            statusCode: {
              500: function() {
                //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
              }
            }
          }).done(function(response) {
              $('#spottedRequestModalContent').html(response);

          }).fail(function() {
                          //$('#'+div_id).html(response);
          });
}




function like_on_comment(cid){

  $.ajax({
          url: 'core/getLikeOnComment.php',
          type: 'POST',
          data:   {
            comment_post_id: cid,
          },
          statusCode: {
            500: function() {
              //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
            }
          }
        }).done(function(response) {
            $('#like_box_comment_'+cid).html(response);

        }).fail(function() {
                        //$('#'+div_id).html(response);
        });
}



function like_off_comment(cid){

      $.ajax({
          url: 'core/getLikeOffComment.php',
          type: 'POST',
          data:   {
            comment_post_id: cid,
          },
          statusCode: {
            500: function() {
              //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
            }
          }
          }).done(function(response) {
              $('#like_box_comment_'+cid).html(response);

          }).fail(function() {
                          //$('#'+div_id).html(response);
      });
}


function delete_comment(cid, pid){

      $.ajax({
          url: 'core/deleteComment.php',
          type: 'POST',
          data:   {
            comment_post_id: cid,
          },
          statusCode: {
            500: function() {
              //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
            }
          }
          }).done(function(response) {
              
              getComments(pid, 1);

          }).fail(function() {
                          //$('#'+div_id).html(response);
      });
}


function getLikes(pid, ln){
  $('#likeModalContent').html(skeleton);
  $.ajax({
            url: 'core/getLikes.php',
            type: 'POST',
            data:   {
              post_id: pid,
              ln: ln,
            },
            statusCode: {
              500: function() {
                //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
              }
            }
          }).done(function(response) {
              $('#likeModalContent').html(response);

          }).fail(function() {
                          //$('#'+div_id).html(response);
          });
}


function getFollowers(pid, ln){
  $('#likeModalContent').html(skeleton);
  $.ajax({
            url: 'core/getFollowers.php',
            type: 'POST',
            data:   {
              user_id: pid,
              ln: ln,
            },
            statusCode: {
              500: function() {
                //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
              }
            }
          }).done(function(response) {
              $('#likeModalContent').html(response);

          }).fail(function() {
                          //$('#'+div_id).html(response);
          });
}


function getFollowersPlace(pid, ln){
  $('#likeModalContent').html(skeleton);
  $.ajax({
            url: 'core/getFollowersPlace.php',
            type: 'POST',
            data:   {
              user_id: pid,
              ln: ln,
            },
            statusCode: {
              500: function() {
                //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
              }
            }
          }).done(function(response) {
              $('#likeModalContent').html(response);

          }).fail(function() {
                          //$('#'+div_id).html(response);
          });
}



function getSeguiti(pid, ln){
  $('#likeModalContent').html(skeleton);
  $.ajax({
            url: 'core/getSeguiti.php',
            type: 'POST',
            data:   {
              user_id: pid,
              ln: ln,
            },
            statusCode: {
              500: function() {
                //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
              }
            }
          }).done(function(response) {
              $('#likeModalContent').html(response);

          }).fail(function() {
                          //$('#'+div_id).html(response);
          });
}





function setFollowOff(uid, type){
  $.ajax({
            url: 'core/setFollowOff.php',
            type: 'POST',
            data:   {
              to_user: uid,
              t: type,
            },
            statusCode: {
              500: function() {
                //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
              }
            }
          }).done(function(response) {
            if(type == 0){
              $('#follow_button_box_like_modal'+uid).html(response);

            }
            if(type == 1){
              $('#follow_button_box_profile'+uid).html(response);
              $('#follow_button_box_user'+uid).html(response);
              updateProfileFollowers(uid);
              $("#profile_box_more_followers").css("display", "none");
              
            }

          }).fail(function() {
                          //$('#'+div_id).html(response);
          });
}




function setFollowOn(uid, type){
  $.ajax({
            url: 'core/setFollowOn.php',
            type: 'POST',
            data:   {
              to_user: uid,
              t: type,
            },
            statusCode: {
              500: function() {
                //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
              }
            }
          }).done(function(response) {
              if(type == 0){
              $('#follow_button_box_like_modal'+uid).html(response);

            }
            if(type == 1){
              $('#follow_button_box_profile'+uid).html(response);
              $('#follow_button_box_user'+uid).html(response);
               updateProfileFollowers(uid);
              $("#profile_box_more_followers").css("display", "block");
            }

          }).fail(function() {
                          //$('#'+div_id).html(response);
          });
}


function updateProfileFollowers(uid){
  $.ajax({
          url: 'core/getProfileUserFollowers.php',
          type: 'POST',
          data:   {
            user_id_get: uid,
          },
          statusCode: {
            500: function() {
              //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
            }
          }
          }).done(function(response) {
              $('#box_followes_number_'+uid).html(response);
              $('#box_followes_number_card'+uid).html(response);

          }).fail(function() {
                          //$('#'+div_id).html(response);
      });

  //$('#box_followes_number_'+uid).html(response);
}


function setFollowPlaceOff(uid, type){
  $.ajax({
            url: 'core/setFollowPlaceOff.php',
            type: 'POST',
            data:   {
              to_user: uid,
              t: type,
            },
            statusCode: {
              500: function() {
                //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
              }
            }
          }).done(function(response) {
            if(type == 0){
              $('#follow_button_box_like_modal'+uid).html(response);
            }
            if(type == 2){
              $('#follow_button_box_place'+uid).html(response);
              updatePlaceFollowers(uid); 
            }

          }).fail(function() {
                          //$('#'+div_id).html(response);
          });
}


function setFollowPlaceOn(uid, type){
  $.ajax({
            url: 'core/setFollowPlaceOn.php',
            type: 'POST',
            data:   {
              to_user: uid,
              t: type,
            },
            statusCode: {
              500: function() {
                //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
              }
            }
          }).done(function(response) {
              if(type == 0){
              $('#follow_button_box_like_modal'+uid).html(response);
            }
            if(type == 2){
              $('#follow_button_box_place'+uid).html(response);
              updatePlaceFollowers(uid);
            }

          }).fail(function() {
                          //$('#'+div_id).html(response);
          });
}



function updatePlaceFollowers(uid){
  $.ajax({
          url: 'core/getPlaceUserFollowers.php',
          type: 'POST',
          data:   {
            user_id_get: uid,
          },
          statusCode: {
            500: function() {
              //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
            }
          }
          }).done(function(response) {
              $('#box_followes_number_'+uid).html(response);

          }).fail(function() {
                          //$('#'+div_id).html(response);
      });

  //$('#box_followes_number_'+uid).html(response);
}


function openDialogSpottedSend(pid){

  $('#spotted_request_post_id').val('');
  $('#spotted_request_post_id').val(pid);

  var a = $('#spotted_request_post_id').val();
  //alert(a);
}



function confirmSpottedSendRequestOn(){
  var pid = $('#spotted_request_post_id').val();
  //alert(pid);
  $.ajax({
          url: 'core/sendSpottedRequestOn.php',
          type: 'POST',
          data:   {
            post_id: pid,
          },
          statusCode: {
            500: function() {
              //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
            }
          }
        }).done(function(response) {
            $('#spotted_box_'+pid).html(response);

        }).fail(function() {
                        //$('#'+div_id).html(response);
        });
}

function confirmSpottedSendRequestOff(pid){

  $.ajax({
          url: 'core/sendSpottedRequestOff.php',
          type: 'POST',
          data:   {
            post_id: pid,
          },
          statusCode: {
            500: function() {
              //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
            }
          }
        }).done(function(response) {
            $('#spotted_box_'+pid).html(response);

        }).fail(function() {
                        //$('#'+div_id).html(response);
        });
}


function addSuggestionRemovePlace(pid) {
  //$("#suggest_place_"+pid).css("display", "none");
  $("#suggest_place_"+pid).fadeOut("slow");
}
function addSuggestionRemoveUser(pid) {
  $("#suggest_user_"+pid).fadeOut("slow");
  //$("#suggest_user_"+pid).css("display", "none");
}



function resetLocation(){
  sessionStorage.removeItem('latitude');
  sessionStorage.removeItem('longitude');
  
}
