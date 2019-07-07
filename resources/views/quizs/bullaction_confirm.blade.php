<script type="text/javascript">

    jQuery(function($) {

        $('table th input:checkbox').on('click' , function(){
            var that = this;
            $(this).closest('table').find('tr > td:first-child input:checkbox')
                .each(function(){
                    this.checked = that.checked;
                    $(this).closest('tr').toggleClass('selected');
                });

        });

        $('.bulk-action-btn').click(function () {

            $chkIds = document.getElementsByName('chkIds[]');
            var $chkCount = 0;
            $length = $chkIds.length;
            for (var $i = 0; $i < $length; $i++) {
                if ($chkIds[$i].type == 'checkbox' && $chkIds[$i].checked) {
                    $chkCount++;
                }
            }

            if ($chkCount <= 0) {
                toastr.info("Please, Select At Least One Record.", "Info:");
                return false;
            }

            var $this = $(this);
            var bulk_action = $this.attr('attr-action-type');
            var form = $('#bulk_action_form');

            bootbox.confirm("Are you sure, You Want To "+bulk_action+" Using Bulk Action?<br>Please, Be Sure When You Use Bulk Action. It Effects All The Selected Data.", function(result) {
                if(result) {
                    $(form).prepend('<input type="hidden" name="bulk_action" value="'+bulk_action+'">')
                    $('#bulk_action_form').submit();
                }
            });

        });

    })


</script>