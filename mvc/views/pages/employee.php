<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Nhân viên</h4>
                    <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary text-center">
                                <th>
                                    ID
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Address
                                </th>
                                <th>
                                    SĐT
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Chức vụ
                                </th>
                                <th>
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                <?php

                                $listNV = $data["listNV"];
                                while ($row = mysqli_fetch_array($listNV)) {
                                ?>
                                    <tr class="text-center">
                                        <td>
                                            <?php echo $row[0] ?>
                                        </td>
                                        <td>
                                            <strong><?php echo $row[1] ?></strong>
                                        </td>
                                        <td>
                                            <?php echo $row[2] ?>
                                        </td>

                                        <td>
                                            <?php echo $row[3] ?>
                                        </td>
                                        <td>
                                            <?php echo $row[4] ?>
                                        </td>
                                        <td>
                                            <?php if ($row[7] == 3) { ?>
                                                <span>Nhân viên kho</span>
                                            <?php } elseif ($row[7] == 4) { ?>
                                                <span>Nhân viên QLSX</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <div>
                                                <a href="Admin/EditProfileNV/<?php echo $row[0] ?>" class="btn btn-success" title="Sửa thông tin"><i class="fas fa-user-edit"></i></a>
                                                <a onclick="return confirm('Bạn có muốn xóa không')" href="Users/XoaUser/<?php echo $row[0] ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>