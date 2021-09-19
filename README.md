# Install steps

## Other

+ Start crontab job to send emails `0 14 * * * docker exec php bin/console email:send-reminders`. Without `-ti`
+ если на маке докер база не запускается то надо выключить галочку gRPS FUSE в настройках докера


tip: drop2Let