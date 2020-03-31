<table border="1">
    <tr>
        <td>书名</td>
        <td>作者</td>
        <td>封面</td>
        <td>状态</td>
        <td>操作</td>
    </tr>
    <?php foreach ($data as $k => $v) { ?>
        <tr>
            <td><?php echo $v['book_name']; ?></td>
            <td><?php echo $v['zuozhe_name']; ?></td>
            <td><img src="/<?php echo $v['book_img'] ?>" width="100px"></td>
            <td><?php if($v['book_type']==1){ ?>
                    未提交
                <?php } else{ ?>
                    已提交
                <?php } ?>
            </td>
            <td>
                <a href="">添加章节</a>
            </td>
        </tr>
    <?php } ?>
</table>