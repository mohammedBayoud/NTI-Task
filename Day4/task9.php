<?php
$students = [
    ["name" => "Ahmed", "course" => "PHP", "grade" => 75],
    ["name" => "Sara", "course" => "JavaScript", "grade" => 48],
    ["name" => "Khaled", "course" => "HTML", "grade" => 60],
    ["name" => "Laila", "course" => "CSS", "grade" => 30],
];
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>Students Table & List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark-subtle p-5">
    <div class="container">
        <h2 class="text-center mb-4">جدول الطلاب</h2>
        
        <!-- table -->
        <table class="table table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>الاسم</th>
                    <th>الكورس</th>
                    <th>الدرجة</th>
                    <th>عرض</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $index => $student): ?>
                    <tr class="<?= $student['grade'] < 50 ? 'table-danger' : '' ?>">
                        <td><?= $student['name'] ?></td>
                        <td><?= $student['course'] ?></td>
                        <td><?= $student['grade'] ?></td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal<?= $index ?>">عرض</button>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="modal<?= $index ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">بيانات الطالب</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>الاسم:</strong> <?= $student['name'] ?></p>
                                    <p><strong>الكورس:</strong> <?= $student['course'] ?></p>
                                    <p><strong>الدرجة:</strong> <?= $student['grade'] ?></p>
                                    <p><strong>الحالة:</strong> <?= $student['grade'] >= 50 ? 'ناجح' : 'راسب' ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>

        <hr class="my-5">

        <h2 class="text-center mb-4">قائمة الطلاب</h2>
        
        <!-- list -->
        <div class="list-group">
            <?php foreach ($students as $index => $student): ?>
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center <?= $student['grade'] < 50 ? 'list-group-item-danger' : '' ?>"
                   data-bs-toggle="modal" data-bs-target="#modal<?= $index ?>">
                    <div>
                        <strong><?= $student['name'] ?></strong> - <?= $student['course'] ?>
                    </div>
                    <span class="badge bg-secondary rounded-pill"><?= $student['grade'] ?></span>
                </a>
            <?php endforeach; ?>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
