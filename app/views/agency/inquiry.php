<?php require_once ("app/views/partials/header.php"); ?>

<table class="table">
    <thead>
        <tr class="text-center">
            <th scope="col">Inquiry Id</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th scope="col">Response</th>
            <th scope="col">Vacation Package Id</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($inquiries as $inquiry): ?>
            <tr class="text-center">
                <td><?php echo htmlspecialchars($inquiry['id']); ?></td>
                <td><?php echo htmlspecialchars($inquiry['subject']); ?></td>
                <td><?php echo htmlspecialchars($inquiry['message']); ?></td>
                <td class="response-column">
                    <?php if (!$inquiry['response']): ?>
                        <form class="response-form d-flex flex-column align-items-center justify-content-center w-auto"
                            data-inquiry-id="<?php echo htmlspecialchars($inquiry['id']); ?>">
                            <input type="hidden" name="inquiry_id" value="<?php echo htmlspecialchars($inquiry['id']); ?>">
                            <textarea class="form-control response-textarea" rows="1" name="response"></textarea>
                            <button type="submit" class="btn btn-primary mt-2">Send Response</button>
                        </form>
                    <?php else: ?>
                        <?php echo htmlspecialchars($inquiry['response']); ?>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="single_package?vp_id=<?php echo htmlspecialchars($inquiry['vp_id']); ?>">
                        <?php echo htmlspecialchars($inquiry['vp_id']); ?>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php if (empty($inquiries)): ?>
            <h3>No Inquiry</h3>
        <?php endif ?>
    </tbody>
</table>

<?php require_once ("app/views/partials/footer.php"); ?>

<script>
    $(document).ready(function () {
        $('.response-form').on('submit', function (e) {
            e.preventDefault();

            var form = $(this);
            var formData = {
                inquiry_id: form.find('[name="inquiry_id"]').val(),
                response: form.find('.response-textarea').val()
            };

            $.ajax({
                type: 'POST',
                url: 'a_inquiry',
                data: formData,
                dataType: 'json',
                success: function (data) {
                    if (data.success) {
                        form.closest('.response-column').html(formData.response);
                    } else {
                        console.error('Error:', data.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error sending response:', error);
                }
            });
        });
    });
</script>