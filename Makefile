.PHONY: install
install:
	@./scripts/install.sh

.PHONY: default-install
default-install:
	@./scripts/install.sh default

.PHONY: update
update:
	@./scripts/update.sh

.PHONY: serve
serve:
	@php artisan serve
