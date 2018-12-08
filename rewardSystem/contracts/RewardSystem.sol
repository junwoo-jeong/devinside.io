pragma solidity ^0.4.24;
/**
* @author : smallThinking(Jeong Junwoo)
* 
**/
contract ERC20Interface {
    event Transfer(address indexed _from, address indexed _to, uint _value);
    event Approval(address indexed _owner, address indexed _spender, uint _value);
    
    function totalSupply() constant public returns (uint _supply);
    function balanceOf(address _who) constant public returns (uint _value);
    function transfer(address _to, uint _value) public returns (bool _success);
    function approve(address _spender, uint _value) public returns (bool _success);
    function allowance(address owner, address _spender) constant public returns (uint _allowance);
    function transferFrom(address _from, address _to, uint _value) public returns (bool _succenss);
}

contract YapYapToken is ERC20Interface{
    // 컨트랙트 오너
    address public owner;
    
    string public name; // 코인 이름
    uint public decimals; // 
    string public symbol; // 상징 이름 
    uint public totalSupply; // // 토큰 전체 개수
    uint private E18 = 1000000000000000000; // 소수점 갯수 
    
    mapping (address => uint) public balanceOf;
    mapping ( address => mapping ( address => uint )) public approvals;
    
    function YapYapToken() public {
        name = "YapYapToken";
        decimals = 18;
        symbol = "KST";
        totalSupply = 100000000 * E18;
        owner = msg.sender;
        
        balanceOf[msg.sender] = totalSupply;
    }
    
    // 발행한 전체 토큰의 자산이 얼마인가?
    function totalSupply() constant public returns (uint) {
        return totalSupply;
    }
    
    // who 주소의 계정에 자산이 얼마 있는가?
    function balanceOf(address _who) constant public returns (uint) {
        return balanceOf[_who];
    }
    
    // 내가 가진 토큰 value 개를 to 에게 보내라.
    function transfer(address _to, uint _value) public returns (bool) {
        require(balanceOf[msg.sender] >= _value);
        
        balanceOf[msg.sender] = balanceOf[msg.sender] - _value;
        balanceOf[_to] = balanceOf[_to] + _value;
        
        Transfer(msg.sender, _to, _value);
        
        return true;
    }
    
    // spender 에게 value 만큼의 토큰을 인출할 권리를 부여한다. 이 함수를 이용할 때는 반드시 Approval 이벤트 함수를 호출해야 한다.
    function approve(address _spender, uint _value) public returns (bool) {
        require(balanceOf[msg.sender] >= _value);
        
        approvals[msg.sender][_spender] = _value;
        
        Approval(msg.sender, _spender, _value);
    }
    
    // owner 가 spender 에게 인출을 허락한 토큰의 개수는 몇개인가?
    function allowance(address _owner, address _spender) constant public returns (uint) {
        return approvals[_owner][_spender];
    }
    
    // 	from 의 계좌에서 value 개의 토큰을 to 에게 보내라. 단, 이 함수는 approve 함수를 통해 인출할 권리를 받은 spender 만 실행할 수 있다.
    function transferFrom(address _from, address _to, uint _value) public returns (bool) {
        require(balanceOf[_from] >= _value);
        require(approvals[_from][msg.sender] >= _value);
        
        approvals[_from][msg.sender] = approvals[_from][msg.sender] - _value;
        balanceOf[_from] = balanceOf[_from] - _value;
        balanceOf[_to] = balanceOf[_to] + _value;
        
        Transfer(_from, _to, _value);
    }
}

contract DevinsideRewardSystem is YapYapToken {
    /**
    * issue 
    * 1. 가입과 탈퇴를 반복 하면서 초기코인을 부당하게 취득할 수 있음
    * 2. 
    **/
    
    event Voting(address _who, address _to, uint _what);
    
    // 어떤 유저가 해당 서비스에 가입되어 있는지
    mapping (address => bool) public isUser;

    // 컨텐츠의 소유는 누구인지
    mapping (uint => address) public contantsOwner;
    
    //컨트렉트 생성 시 실행
    // function DevinsideRewardSystem() public {

    // }

    function getContantsOwner(uint _what) public returns (address) {
        return contantsOwner[_what];
    }
    
    // 탈퇴 기능
    function signOut() public {
        
    }
    
    // 가입 기능
    function signUp() public {
        // require(이미 가입된 사용자인지 검사)
        require(isUser[msg.sender]);
        // 가입을 원하는 사용자 활성화
        isUser[msg.sender] = true;
        // 토큰 오너가 사용자에게 초기 토큰 지급
        
    }

    // 보팅 기능
    function voting(address _who, uint _what) public returns (bool){
        require(isUser[msg.sender]);
        address _to = getContantsOwner[_what];
        transfer(_to, 100);

        return true;
    }


    // 글 작성 기능
    
    // 글 삭제 기능
    
    // 
}