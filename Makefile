app_name=$(notdir $(CURDIR))
appstore_build_dir=$(CURDIR)/build/appstore/inline_menu
appstore_artifact_dir=$(CURDIR)/build/artifacts/appstore
appstore_package_name=$(appstore_artifact_dir)/$(app_name)
occ=/var/www/html/owncloud/occ

appstore:
	rm -rf $(appstore_build_dir) $(appstore_artifact_dir)
	mkdir -p $(appstore_build_dir) $(appstore_artifact_dir)
	cp --parents -r \
	"appinfo" \
	"controller" \
	"templates" \
	"AUTHORS.md" \
	"CHANGELOG.md" \
	"LICENSE.txt" \
	"README.md" \
	$(appstore_build_dir)
	tar -czf $(appstore_package_name).tar.gz -C $(appstore_build_dir)/../ $(app_name)

