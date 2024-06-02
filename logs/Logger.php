<?php
/**
* Copyright Since 2007 ALCALINK E-COMMERCE & SEO, S.L.L.
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.md.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
*
* DISCLAIMER
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
* AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
* LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
* OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
* THE SOFTWARE.
*
* @author ALCALINK E-COMMERCE & SEO, S.L.L. <info@alcalink.com>
* @copyright  Since 2007 ALCALINK E-COMMERCE & SEO, S.L.L.
* @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
* Registered Trademark & Property of ALCALINK E-COMMERCE & SEO, S.L.L.
**/

declare(strict_types=1);

final class Logger
{
    private $dir;
    private $message;
    private $route;
    private $type;

    public function __construct()
    {
        $this->dir = __DIR__ . '/';
    }

    public function add(int|string|array|object $message, string $route, string $type = 'info'): void
    {
        $this->removeOldFiles($type);

        $this->type = $type;
        $this->message = var_export($message, true);
        $this->route = $route;

        $date = date('Y-m-d');
        
        $reportfile = fopen($this->dir . $this->type . '-' . $date . '.log', 'a+');

        /* If the file size does not exceed 50MB to avoid excessive file size */
        if (filesize($this->dir . $this->type . '-' . $date . '.log') <= 52428800 ) {
            fwrite(
                $reportfile,
                '[' . date('Y-m-d H:i:s') . '] [' . strtoupper($this->type) . 
                ' | Message: ' . $this->message .
                ' | Route File: ' . $this->route .
                ']' . PHP_EOL
            );
        }

        fclose($reportfile);
    }

    private function removeOldFiles(string $type): void
    {
        $date = date('Y-m-d', strtotime(date('Y-m-d') . ' - 30 day'));
        $reportfiles = glob($this->dir . $type . '*.log');

        foreach ($reportfiles as $reportfile) {
            $reportfile = str_replace([$type . '-', '.log'], ['', ''], basename($reportfile));
            if (strtotime($reportfile) < strtotime($date)) {
                unlink($this->dir . $type . '-' . $reportfile . '.log');
            }
        }
    }
}
