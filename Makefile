vendor: composer.json composer.lock
	composer install -n --prefer-dist

mutation-test:
	-vendor/bin/infection --configuration=infection.json.dist --min-covered-msi=80 --min-msi=80

phpcs:
	-vendor/bin/phpcs -p --colors

phpmd:
	-vendor/bin/phpmd src/ text phpmd.xml.dist > output/mess-detector.txt

phpstan:
	-vendor/bin/phpstan analyse src/ tests/ -l max --no-interaction --no-progress --error-format=checkstyle > output/checkstyle.xml

coverage-test:
	vendor/bin/phpunit --config phpunit.xml.dist

code-standards: phpcs phpmd phpstan
