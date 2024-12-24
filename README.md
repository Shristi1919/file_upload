# For job tabe : php artisan queue:table and php artisan migrate

# For Failed Table : php artisan queue:failed-table and php artisan migrate

# In .env file QUEUE_CONNECTION=database

# Run queue:work Continuously Using a Batch File in windows.

You can create a batch file to start the queue worker and then schedule it to run using Task Scheduler.

# Step 1. Create a Batch File

Open a text editor (e.g., Notepad) and paste the following:

@echo off
cd /d C:\path\to\your\laravel\project
php artisan queue:work --sleep=3 --tries=3
Save the file as queue_worker.bat in a location like C:\scripts.

Replace C:\path\to\your\laravel\project with the full path to your Laravel project.

# Step 2. Schedule the Batch File Using Task Scheduler

Open Task Scheduler:

Press Win + S and search for "Task Scheduler."
Create a New Task:

Click on "Create Task" in the right pane.
General Settings:

Name your task (e.g., "Laravel Queue Worker").
Select "Run whether user is logged on or not".
Check "Run with highest privileges."
Trigger:

Go to the "Triggers" tab and click "New...".
Select "At startup" or "Daily", depending on your preference.
Action:

Go to the "Actions" tab and click "New...".
Select "Start a program."
In the "Program/script" field, browse to the queue_worker.bat file.
Save and Test:

Save the task.
Test it by right-clicking the task and selecting "Run."

# Why Use dispatch()?

The dispatch() function allows you to perform heavy or time-consuming tasks (like file uploads, sending emails, or processing reports) in the background without blocking the main application process. This improves user experience and application performance.
