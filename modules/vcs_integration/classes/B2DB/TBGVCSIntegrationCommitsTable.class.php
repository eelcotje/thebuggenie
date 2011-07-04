<?php
	/**
	 * B2DB Table, vcs_integration -> VCSIntegrationCommitsTable
	 *
	 * @author Philip Kent <kentphilip@gmail.com>
	 * @version 3.2
	 * @license http://www.opensource.org/licenses/mozilla1.1.php Mozilla Public License 1.1 (MPL 1.1)
	 * @package thebuggenie
	 * @subpackage vcs_integration
	 */

	/**
	 * B2DB Table, vcs_integration -> VCSIntegrationCommitsTable
	 *
	 * @package thebuggenie
	 * @subpackage vcs_integration
	 */
	class TBGVCSIntegrationCommitsTable extends TBGB2DBTable 
	{

		const B2DB_TABLE_VERSION = 1;
		const B2DBNAME = 'vcsintegration_commits';
		const ID = 'vcsintegration_commits.id';
		const SCOPE = 'vcsintegration_commits.scope';
		const LOG = 'vcsintegration_commits.log';
		const OLD_REV = 'vcsintegration_commits.old_rev';
		const NEW_REV = 'vcsintegration_commits.new_rev';
		const AUTHOR = 'vcsintegration_commits.author';
		const DATE = 'vcsintegration_commits.date';
		const DATA = 'vcsintegration_commits.data';
					
		public function __construct()
		{
			parent::__construct(self::B2DBNAME, self::ID);
			parent::_addText(self::LOG, false);
			parent::_addVarchar(self::OLD_REV, 40);
			parent::_addVarchar(self::NEW_REV, 40);
			parent::_addInteger(self::DATE, 10);
			parent::_addText(self::DATA, false);
			parent::_addForeignKeyColumn(self::SCOPE, TBGScopesTable::getTable(),  TBGScopesTable::ID);
			parent::_addForeignKeyColumn(self::AUTHOR, TBGUsersTable::getTable(), TBGUsersTable::ID);
		}
		
		/**
		 * Return an instance of this table
		 *
		 * @return TBGVCSIntegrationCommitsTable
		 */
		public static function getTable()
		{
			return B2DB::getTable('TBGVCSIntegrationCommitsTable');
		}
	}
