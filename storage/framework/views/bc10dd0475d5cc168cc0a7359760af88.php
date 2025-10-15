<nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">

    <?php
        $staff_member_name = 'User';

        $staff_member_id = request()->cookie('staff_member_id');
        $staff_member = App\Models\StaffMember::find($staff_member_id);

        if ($staff_member) {
            $staff_member_name = $staff_member->name;
        }
    ?>
    <div class="container-fluid">
        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">

            

            <li class="nav-item topbar-user hidden-caret">
                <a class="profile-pic"
                    href="javascript:void(0);">
                    <div class="avatar-sm">
                        <img src="https://icons.iconarchive.com/icons/double-j-design/origami-colored-pencil/128/red-user-icon.png" alt="..."
                            class="avatar-img rounded-circle">
                    </div>
                    <span class="profile-username">
                        <span class="op-7">Bonjour,</span> <span class="fw-bold"><?php echo e($staff_member_name); ?></span>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</nav>
<?php /**PATH /home/blowmusi/public_html/grandpublic/resources/views/backoffice/partials/navbar.blade.php ENDPATH**/ ?>