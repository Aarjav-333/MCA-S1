from typing import List

class Solution:
    def twoSum(self, nums: List[int], target: int) -> List[int]:
        seen = {}
        for i, num in enumerate(nums):
            complement = target - num # 7 - 5 = 2
            if complement in seen: # 2 
                return [seen[complement], i]
            seen[num] = i
        return []  # shouldn't happen since one solution is guaranteed

# Example usage:
solution = Solution()
print(solution.twoSum([2, 7, 11, 15], 9))   # [0, 1]
print(solution.twoSum([3, 2, 4], 6))        # [1, 2]
print(solution.twoSum([3, 3], 6))           # [0, 1]
