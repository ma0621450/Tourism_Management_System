<?php
require_once ("app/views/partials/header.php");
?>
<table class="table ">
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
                <td>
                    <?php if (!$inquiry['response']): ?>
                        <form class="d-flex flex-column align-items-center justify-content-center w-auto" method="post">
                            <input type="hidden" name="inquiry_id" value="<?php echo htmlspecialchars($inquiry['id']); ?>">
                            <textarea class="form-control" rows="1" name="response"></textarea>
                            <button type="submit" class="btn btn-primary mt-2">Send Response</button>
                        </form>
                    <?php else: ?>
                        <?php echo htmlspecialchars($inquiry['response']); ?>
                    <?php endif; ?>
                </td>
                <td>
                    <a
                        href="single_package?vp_id=<?php echo htmlspecialchars($inquiry['vp_id']); ?>"><?php echo htmlspecialchars($inquiry['vp_id']); ?></a>
                </td>
            </tr>
        <?php endforeach; ?>
</table>

<?php require_once ("app/views/partials/footer.php") ?>