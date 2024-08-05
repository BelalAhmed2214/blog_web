# Blog Platform

## Description
A comprehensive blogging platform where users can publish posts, comment on posts, and reply to comments. The platform includes a robust role and permission system to manage user capabilities.

## Version
**v1**

## Completed in V1

### Features
- **Posts and Comments**
  - CRUD operations for posts with user relations.
  - CRUD operations for comments with post and user relations.

### Design Patterns and Principles
- Implemented the **Repository Pattern**.
- Utilized **Custom Requests** in a separate file, adhering to the **Single Responsibility Principle** (SOLID).
- Employed **Resources** to handle responses in the show method.

### Authorization
- Integrated the **Spatie-Permission** package to manage roles and permissions for users.
- Created view pages to manage roles and permissions, displaying assigned permissions in the roles table.

## Planned for V1

### Features
- **Replies**
  - Create a replies table for comments.

### Refactoring
- Refactor **Role & Permission Controller**.

### Authorization
- Implement authorization for **ReplyController**.

## Structure
- **Posts**
  - CRUD operations related to user.
- **Comments**
  - CRUD operations related to posts and user.
- **Replies**
  - To be added: CRUD operations related to comments and user.

## Design Patterns
- **Repository Pattern**: Ensures a clean separation of concerns between data access logic and business logic.
- **Custom Requests**: Isolated request logic from controllers, ensuring adherence to the Single Responsibility Principle.
- **Resources**: Standardized response formatting in show methods.

## Authorization
- **Spatie-Permission**: Manages user roles and permissions efficiently.
- **Role and Permission Views**: Provides an interface for assigning and viewing permissions associated with roles and users.

---

This README file is styled to give a clear and concise overview of the platform's features, design patterns, principles, and authorization logic. It outlines both what has been accomplished and what is planned for the current version.
