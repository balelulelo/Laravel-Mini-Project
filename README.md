
| Name    | NRP |
| -------- | ------- |
| Muhammad Iqbal Shafarel  | 5025231080    |


# Study Partner Finding Web

A simple web application built with Laravel to help users find study partners based on  major and study interests (subjects).

Link to the demo video:

https://youtu.be/CiJFJXiSbEo

## Project Plan 


1.  **Foundation:** Setting up a new Laravel project using **Laravel Herd** and configuring it with an **SQLite** database for simplicity.
2.  **Authentication:** Implementing user registration and login using **Laravel Breeze**.
3.  **Basic Views & Routing:** Creating routes and simple Blade views (`/partners`, `/partner/{id}`) using dummy data initially.
4.  **Blade Templating:** Utilizing Blade directives (`@forelse`), layouts (`<x-app-layout>`), slots (`<x-slot>`), and creating reusable components (`<x-partner-card>`).
5.  **Styling:** Integrating **Tailwind CSS** for frontend styling and customizing the color palette.
6.  **Database Structure:**
    * Defining database schema using **Migrations** for `study_profiles` and `subjects` tables, including foreign keys.
    * Creating a **many-to-many relationship** between `StudyProfile` and `Subject` using a pivot table (`subject_study_profile`).
    * Creating a **many-to-many relationship** between `User` and `User` for the "Connect" feature using a pivot table (`connections`).
7.  **Data Handling:**
    * Setting up **Eloquent Models** (`StudyProfile`, `Subject`) with fillable attributes and relationships (`belongsTo`, `hasOne`, `belongsToMany`).
    * Using **Model Factories** (`StudyProfileFactory`, `SubjectFactory`) and **Seeders** (`StudyProfileSeeder`, `SubjectSeeder`) to populate the database with realistic dummy data.
8.  **MVC Implementation:** Refactoring logic from routes into **Controllers** (`PartnerController`, `ProfileController`, `ConnectionController`, `DashboardController`). Implementing **Route Model Binding**.
9.  **Core Features:**
    * Displaying paginated lists of partners (**Pagination**).
    * Implementing full **CRUD** functionality for the user's `StudyProfile` (Create/Update via form, Read, Delete).
    * Handling web forms (`POST`, `PATCH`, `DELETE` requests), including validation and displaying errors/success messages (**Flash Messages**).
10. **Extra Features:**
    * Implementing a "Connect" system between users.
    * Building a functional **Dashboard** displaying user profile info and connected partners.
    * Adding **Search and Filtering** capabilities to the partner list based on name, major, and subject.
    * Implementing **relevance sorting** based on matching subjects with the logged-in user.



## Tools Used & Rationale

* **Framework:** Laravel
* **Database:** SQLite
* **Authentication:** Laravel Breeze
    * **Why Breeze over Livewire?** For this learning project, the focus was on traditional server-side rendering with Blade templates. Breeze provides a minimal and straightforward starting point using familiar Blade components and Tailwind CSS, aligning perfectly with the goal of understanding core Laravel concepts like MVC, routing, and basic form handling without adding the complexity of full-stack JavaScript frameworks like Livewire (full-stack components) or Inertia (SPA approach with Vue/React).

## Main Features

* **User Authentication:** Registration, Login, Logout, Password Management (provided by Breeze).
* **Study Profile Management (CRUD):**
    * Users can create, view, update, and delete their study profile (Bio, City, Major, Subjects).
* **Partner Discovery:**
    * View a **paginated list** of all registered study partners.
    * View **detailed profiles** of individual partners.
* **Search & Filtering:**
    * Search partners by **name**.
    * Filter partners by **major**.
    * Filter partners by selected **subject**.
* **Relevance Sorting:**
    * The partner list is automatically sorted to show partners with the most **matching subjects** to the logged-in user first.
* **Connection System:**
    * Users can "Connect" with other users they find interesting.
    * Users can "Disconnect" from connected users.
* **Dashboard:**
    * Displays a summary of the logged-in user's study profile.
    * Shows a list of the user's current **connections** with links to view their profiles or disconnect.

---
