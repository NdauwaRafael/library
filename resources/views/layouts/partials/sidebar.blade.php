<aside class="sidebar">
    @auth
        <ul class="vertical menu accordion-menu" data-accordion-menu>
            <li>
                <a href="#">Dashboard</a>
            </li>

            <li>
                <a href="#">Books</a>
                <ul class="menu vertical nested">
                    <li><a href="/issued">Issued Books</a></li>
                    <li><a href="/listbooks">all Books</a></li>
                    <li><a href="/addbook">Add Book</a></li>
                </ul>
            </li>

            <li>
                <a href="/requests">Requests</a>
            </li>

            <li>
                <a href="#">Issues</a>
            </li>

            <li>
                <a href="#">Users</a>

                <ul class="menu vertical nested">
                    <li><a href="/users">View Users</a></li>
                </ul>

            </li>

            <li>
                <a href="#">Roles & Permissions</a>
                <ul class="menu vertical nested">
                    <li><a href="/roles">Roles</a></li>
                </ul>
            </li>

            <li>
                <a href="#">Subject</a>
                <ul class="menu vertical nested">
                    <li><a href="/subjects">Subjects</a></li>
                </ul>
            </li>

            <li>
                <a href="#">Department</a>
                <ul class="menu vertical nested">
                    <li><a href="/departments">Departments</a></li>
                </ul>
            </li>

        </ul>
    @endauth
</aside>
