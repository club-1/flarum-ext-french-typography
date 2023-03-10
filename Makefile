DATE = $(shell date +%F)
REPO_URL = https://github.com/club-1/flarum-ext-french-typography

all: vendor src/Formatter/FrenchFancyPants/Parser.js;

dev: vendor src/Formatter/FrenchFancyPants/Parser.js;

vendor: composer.json composer.lock
	composer install
	touch $@

src/Formatter/FrenchFancyPants/Parser.js: vendor/s9e/text-formatter/src/Plugins/FancyPants/Parser.js patches/french-fancy-pants-parser-js.diff
	patch $^ -o $@

# Create a new release
releasepatch: V := patch
releaseminor: V := minor
releasemajor: V := major
release%: PREVTAG = $(shell git describe --tags --abbrev=0)
release%: TAG = v$(shell semver -i $V $(PREVTAG))
release%: CONFIRM_MSG = Create release $(TAG)
releasepatch releaseminor releasemajor: release%: .confirm check all
	sed -i CHANGELOG.md \
		-e '/^## \[unreleased\]/s/$$/\n\n## [$(TAG)] - $(DATE)/' \
		-e '/^\[unreleased\]/{s/$(PREVTAG)/$(TAG)/; s#$$#\n[$(TAG)]: $(REPO_URL)/releases/tag/$(TAG)#}'
	git add CHANGELOG.md
	git commit -m $(TAG)
	git push
	git tag $(TAG)
	git push --tags

check: ;

clean:
	rm -rf vendor

.confirm:
	@echo -n "$(CONFIRM_MSG)? [y/N] " && read ans && [ $${ans:-N} = y ]

.PHONY: all dev releasepatch releaseminor releasemajor check clean .confirm
