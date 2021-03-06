<?php

/**
 * @file comment-wrapper.tpl.php
 * Default theme implementation to wrap comments.
 *
 * Available variables:
 * - $content: All comments for a given page. Also contains sorting controls
 *   and comment forms if the site is configured for it.
 *
 * The following variables are provided for contextual information.
 * - $node: Node object the comments are attached to.
 * The constants below the variables show the possible values and should be
 * used for comparison.
 * - $display_mode
 *   - COMMENT_MODE_FLAT_COLLAPSED
 *   - COMMENT_MODE_FLAT_EXPANDED
 *   - COMMENT_MODE_THREADED_COLLAPSED
 *   - COMMENT_MODE_THREADED_EXPANDED
 * - $display_order
 *   - COMMENT_ORDER_NEWEST_FIRST
 *   - COMMENT_ORDER_OLDEST_FIRST
 * - $comment_controls_state
 *   - COMMENT_CONTROLS_ABOVE
 *   - COMMENT_CONTROLS_BELOW
 *   - COMMENT_CONTROLS_ABOVE_BELOW
 *   - COMMENT_CONTROLS_HIDDEN
 *
 * @see template_preprocess_comment_wrapper()
 * @see theme_comment_wrapper()
 */
?>
<?php
$notes_url = request_uri();
?>

<?php if ($content) : ?>
<div id="comments" class="comments block <?php print $skinr; ?>">
    <h2 class="comments-header">
        <?php
        if ($node->type != "feedback") {
            print t('Comments');
        } else if ($node->type == "feedback" && (strpos($notes_url, '/print/') != FALSE)) {
            print t('Notes');
        }
        ?>
    </h2>
    <?php
    if ($node->type == "feedback" && (strpos($notes_url, '/print/') == FALSE)) {
        ?>
        <script>
            var txtlength = $('#edit-comment').val().length;
            var desc = 'note-textarea-limit-count';
            $('#'+desc).html(parseInt(3000)-txtlength) ;
        </script>
    <table id="feedback-note" class="feedback-table">
      <tbody>
        <tr>
            <th style="width:800px;">Note</th>
            <th>Author</th>
            <th>Date</th>
        </tr>
        <?php } ?>

    <?php print $content; ?>
    <?php if ($node->type == "feedback" && (strpos($notes_url, '/print/') == FALSE)) { ?>
    </tbody>
  </table>
  <?php } ?>
</div>
    <?php endif; ?><!-- /comments -->
