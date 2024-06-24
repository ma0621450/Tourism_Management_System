<?php
require_once ("app/views/partials/header.php");
?>
<table class="table">
    <thead>
        <tr class="text-center">
            <th scope="col">Inquiry Id</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th scope="col">Response</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($inquiries as $inquiry) { ?>
            <tr class="text-center" id="inquiry-<?php echo htmlspecialchars($inquiry['id']); ?>">
                <td><?php echo htmlspecialchars($inquiry['id']); ?></td>
                <td><?php echo htmlspecialchars($inquiry['subject']); ?></td>
                <td><?php echo htmlspecialchars($inquiry['message']); ?></td>
                <td>
                    <?php if (!$inquiry['response']) { ?>
                        <span class="text-secondary">No Response</span>
                    <?php } else { ?>
                        <span class="fw-bold"><?php echo htmlspecialchars($inquiry['response']); ?></span>
                        <form class="d-inline" onsubmit="deleteInquiry(event, <?php echo htmlspecialchars($inquiry['id']); ?>)">
                            <input type="hidden" name="inquiry_id" value="<?php echo htmlspecialchars($inquiry['id']); ?>">
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
        <?php if (empty($inquiries)): ?>
            <h3>No Inquiries</h3>
        <?php endif ?>
    </tbody>
</table>
<?php require_once ("app/views/partials/footer.php"); ?>

<script>
    function deleteInquiry(event, inquiryId) {
        event.preventDefault();

        if (!confirm('Are you sure you want to delete this inquiry?')) {
            return;
        }

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete_inquiry', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    document.getElementById('inquiry-' + inquiryId).remove();
                    alert('Inquiry deleted successfully.');
                } else {
                    alert('Failed to delete inquiry: ' + response.message);
                }
            } else {
                alert('Request failed. Status: ' + xhr.status);
            }
        };
        xhr.onerror = function () {
            alert('Request failed. Please try again later.');
        };
        xhr.send('inquiry_id=' + inquiryId);
    }
</script>