# Project Management Tool Application

This web application uses CRUD functionality to manage a project portfolio. An administrator can create user accounts, add/edit/archive and delete projects. 
The system is designed using a Model View Controller (MVC) architecture.

## Description
The application will allow an administrator to create user profiles for project managers. The administrator adds a new project and assigns a project manager. The project manager can upload/download documents from the project. The adminstrator can update the project status and RAG status. 
The database also contains a column called ‘is_admin’. By changing isAdmin to 1, the user becomes an administrator, unlocking the administrator features. 

## Build
The application was developed using Laravel 10 and Bootstrap 5.2
* Docker Desktop used to run the application
* TablePlus used to display the MySQL database

## Features
* Authentication - Registration and Login
* Validation
* Error messages
* Document upload/download



### Administrator Features
*   An administrator is provided with the following features:
*	Add a new project to the portfolio
*	View all projects
*	Edit a project, e.g., Update project stage and/or RAG Status
*	Delete an project
*   Archive a project 
*	Upload and download documents from an individual project


## Licence
Copyright 2023 Kevin O'Kane

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
