<?php require ("app/views/partials/header.php"); ?>

<table class="table">
    <thead>
        <tr class="text-center">
            <th scope="col">Inquiry Id</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th scope="col">Response</th>
            <th scope="col"></th>
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
                    <td>
                        <form class="d-inline delete-inquiry-form"
                            data-inquiry-id="<?php echo htmlspecialchars($inquiry['id']); ?>">
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                <?php } ?>
                </td>
            </tr>
        <?php } ?>
        <?php if (empty($inquiries)): ?>
            <h3>No Inquiries</h3>
        <?php endif ?>
    </tbody>
</table>

<?php require ("app/views/partials/footer.php"); ?>

<script src="public/js/customer/inquiry.js"></script>