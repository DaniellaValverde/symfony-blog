# symfony-blog
A symfony project for a blog

The repository contains a Symfony project for a simple blog with the following functionalities:
- Registration and login system
- Diferent user roles (ROLE_ADMIN and ROLE_BLOGGER)
- An index page listing all posts, accessible to all. If a user is not connected, no action must appear next to the posts.
- Creation and editing of posts requires the role ROLE_BLOGGER.
- Deleting posts and editing users (Users list) requires the role ROLE_ADMIN.
- Creating, editing and deleting a post is accessible to any user with ROLE_BLOGGER. However, the post must belong to the connected user for editing and deleting.
- If a user is deleted his/her posts remain in the list.

Getting Started:
- Symfony version: 3.4
- The script symfo.sh loads the database used in this project and starts server.
- Pass database's username as parameter (./symfo.sh my_user)
