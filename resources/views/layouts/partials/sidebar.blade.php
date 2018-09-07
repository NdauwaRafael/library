<aside class="sidebar">
    @auth
        <ul class="vertical menu">
            <li>
                <a href="#">Dashboard</a>
            </li>

            <li>
                <a href="#">Books</a>
                <ul class="menu vertical nested">
                    <li><a href="#">Issue Book</a></li>
                    <li><a href="#">Issued Books</a></li>
                    <li><a href="#">Add Book</a></li>
                </ul>
            </li>

            <li>
                <a href="#">Requests</a>
            </li>

            <li>
                <a href="#">Issues</a>
            </li>

            <li>
                <a href="#">Users</a>

                <ul class="menu vertical nested">
                    <li><a href="#">Add User</a></li>
                    <li><a href="#">View Users</a></li>
                </ul>

            </li>

            <li>
                <a href="#">Roles & Permissions</a>

                <ul class="menu vertical nested">
                    <li><a href="#">Roles</a></li>
                    <li><a href="#">Permissions</a></li>
                </ul>

            </li>

        </ul>
    @endauth
</aside>