Small MVP freelance project which I continued to improve during my learning of Symfony framework.

It's a manager interface for insurance company. 
Here you can:
* login/register
* restore your password
* CRUD clients
* CRUD insurances for clients
* CRUD attachments for clients and insurances

# Install steps
Just run `docker-compose up`. Project will be available on address `http://localhost:8080`

## Other
* Start crontab job to send emails `0 14 * * * docker exec php bin/console email:send-reminders`. Without `-ti`
* If database doesn't start on Mac, you need disable `gRPS FUSE` in docker settings.
