$(function() {
    /*var $modeSelect = $('select[name="mode"]'),
        $repoSelect = $('select[name="repo_id"]'),
        $refreshPeriod = $('select[name="refresh_period"]'),
        apiPrefix = '/api/v1/';

    function updateBranchesList() {
        var mode = $modeSelect.val(),
            repoId = $repoSelect.val(),
            $branchList = $('#branchList');
        
        if (mode === 'BRANCH') {
            $('#tag_prefix').hide();
            showOverlay('.panel .panel-body');

            $.when($.get(apiPrefix + 'getBranchesList', {
                    repoId: repoId
                }, function(data) {
                    $branchList.html(data);
                }
            )).then(function() {
                $branchList.show();
                $('[name="branch_name"]').select2();
                hideOverlay('.panel .panel-body');
            });
        }
        
        if (mode === 'TAG') {
            $('#tag_prefix').show();
            $('#branchList').hide();
        }
    }*/

    /*function showOverlay(_selector) {
        var selector = _selector || document,
            $el = $(selector),
            offset = $el.offset(),
            width =  $el.outerWidth(),
            height = $el.outerHeight();

        $('#overlay').css({
            'width': width,
            'height': height,
            'display': 'table',
            'left': offset.left,
            'top': offset.top
        });
    }
    
    function hideOverlay() {
        $('#overlay').css({
            'width': 0,
            'height': 0,
            'display': 'none',
            'left': 0,
            'top': 0
        });
    }

    if (window.instances_repoId) {
         $repoSelect.val(window.instances_repoId);
         $modeSelect.prop('disabled', false).removeClass('disabled');
    }

    if (window.instances_mode) {
         $modeSelect.val(window.instances_mode);
    }

    if (window.instances_repoId && window.instances_mode && window.instances_mode === 'BRANCH') {
        updateBranchesList();
    }

    if (window.instances_repoId && window.instances_mode && window.instances_mode === 'TAG') {
        $('#tag_prefix').show();
        $('#branchList').hide();
    }

    $repoSelect.on('change', function() {
        $modeSelect.prop('disabled', false).removeClass('disabled');
    });

    $modeSelect.on('change', function() {
        updateBranchesList();
    });

    $refreshPeriod.on('change', function() {
        if ($refreshPeriod.val() !== "0") {
            $('[name="is_persistant"]').prop('checked', true);
        } else {
            $('[name="is_persistant"]').prop('checked', false);
        }
    });

    if ($('.instancesList')[0]) {
        setInterval(function () {
            $.get(apiPrefix + 'getInstancesList', {
                }, function(data) {
                    $('.instancesList').html(data);
                }
            );
        }, 3000);
    }
    
    if ($('.reposList')[0]) {
        setInterval(function () {
            $.get(apiPrefix + 'getReposList', {
                }, function(data) {
                    $('.reposList').html(data);
                }
            );
        }, 3000);
    }

    if (window.Buildkiter.menuSection) {
        $('ul.main-navbar').find('.' + window.Buildkiter.menuSection).addClass('active');
    }
*/
    new Clipboard('.copy-link');
});