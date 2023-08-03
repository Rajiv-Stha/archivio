<div style="z-index: 99999!important;" class="modal fade modalbox" id="ModalComments" data-bs-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h3 class="modal-title text-white ">Commenti</h3>
                <a href="#"   class="text-white"><b>Chiudi</b></a>
            </div>
            
            <div class="modal-body p-0">

                <div class="section mb-2 bg-white pt-2 pb-2">
                    <div id="commentModalContent">
                        
                    </div>
                </div>
            </div>

                <div class="chatFooter">
                    <form id="add_comment" name="add_comment" method="POST"  onsubmit="event.preventDefault();">
                        <div class="avatar">
                            <img src="<?php echo $path_url; ?>/assets/img/sample/avatar/avatar4.jpg" alt="avatar" class="imaged w32 rounded">
                        </div>
                        <div class="form-group boxed pe-2">
                            <div class="input-wrapper">
                                <input type="text" class="form-control" placeholder="Lascia un commento..." name="comment_text" id="comment_text">
                                <input type="hidden" class="form-control" value="" id="comment_post_id" name="post_id">
                            </div>
                        </div>
                        <button type="submit" name="add_comment_" onclick="submitComment();" class="btn btn-icon btn-primary rounded">
                            <i class="bi bi-send"></i>
                        </button>
                    </form>
                </div>

            </div>
            <!-- * Card Body -->
        </div>
        <!-- * Card -->
    </div>
</div>
<!-- * Like Modal -->


<script type="text/javascript">


function submitComment(){
    $.ajax({
        url: 'core/addComment.php',
            type: "POST",
            data: $('#add_comment').serialize(),
            success: function(data){
                var pid = $('#comment_post_id').val();
                $('#comment_text').val('');
                $('#comment_post_id').val('');
                getComments(pid, 1);
            },
            error: function(){
                alert("Si è verificato un errore!");
            }
    });
};


</script>