<html><body><h1>Mod-Rewrite is not enabled</h1><p>Please enable rewrite module on your web server to continue</body></html>

        <?php
          if(in_array('mod_rewrite', apache_get_modules()))
                        {
                        echo 'yes';
                        }
                        else
                        {
                        echo 'no';
                        }
          ?>