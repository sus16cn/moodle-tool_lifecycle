<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

defined('MOODLE_INTERNAL') || die();

require_once(__DIR__ . '/../../lib.php');

use \tool_cleanupcourses\entity\workflow;
use \tool_cleanupcourses\manager\workflow_manager;

/**
 * Tests creating storing and retrieving a workflow object.
 * @package    tool_cleanupcourses
 * @category   test
 * @group      tool_cleanupcourses
 * @copyright  2017 Tobias Reischmann WWU
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class tool_cleanupcourses_persist_workflow_testcase extends \advanced_testcase {

    /** workflow */
    private $workflow;

    public function setUp() {
        $this->resetAfterTest(true);
        $record = new stdClass();
        $record->id = null;
        $record->title = 'Title';
        $this->workflow = workflow::from_record($record);
    }

    /**
     * Test the creation of a process.
     */
    public function test_create() {
        $this->assertNull($this->workflow->id);
        workflow_manager::insert_or_update($this->workflow);
        $this->assertNotNull($this->workflow->id);
    }

}